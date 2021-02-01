<template>

<div>
    <div class="row" >
    <div class="col-lg-3 col-6" v-for="post in posts" :key='post.id' >
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h1><StarRating 
                        :star-size='20'
                        @rating-selected="ratePost(post.id,post.post_reviews[0].rating)"
                        v-model='post.post_reviews[0].rating' /></h1>

                        <p>{{post.post}}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <div class="small-box-footer">
                        <template v-if="loge_in_auth == post.user_id">
                            <a  style="color:white" :href="edit_url+post.id" ><i class="fas fa-edit"> edit</i></a> | 
                            <a @click="deletePost(post.id)" style="color:white" href="#" ><i  class="fas fa-trash"> delete</i></a>
                        </template>
                        
                    </div>
                    
                </div>
            </div>
        </div>  
    
    </div>
</div>  
</template>

<script>
import StarRating from 'vue-star-rating'
    export default {
        name: 'allPosts',
        components: {
            StarRating
        },
         data(){
            return{
                edit_url:'/edit/',
                posts: {},
                errors: {},
                loge_in_auth: null,
                rate:2,
            }
        },
        created(){
            this.getAllPosts()
        },
        beforeUpdate() {
            this.manipulateData()
        },
        
          methods: {
            deletePost(post_id)
            {
                 this.$swal({
                title: 'Are you sure?',
                text: 'Are you sure you want to delete this post',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it'
            }).then(() => (
                axios.delete('delete_post/' + post_id, {
                }).then(resp => {
                    if(resp.data === 'success') {
                        this.getAllPosts()
                        this.$swal('Successfully Deleted!', '', 'success')
                    }
                        
                    
                }).catch(err => {
                    console.log(err.response)
                }))
            ).catch(dismiss => (dismiss !== 'cancel' ? undefined : this.$swal('Cancelled', '', 'error')))
            },
            ratePost(id,rate)
            {
                 axios.put('/rate_post', {
                        post_id: id,
                        rate: rate,
                    }).then(response => { 
                        

                    }).catch( error => {
                       
                    })
            },
            manipulateData(){ 
                
                Object.entries(this.posts).forEach(([key, value]) => { 
                    if(!value.post_reviews.length){
                        this.posts[key].post_reviews.push({
                            post_id : value.id,
                            rating : 0
                        })
                  
                    }
                   
                }, this);
            },
            getAllPosts()
            {
                axios.get('get_all_posts/')
                    .then(response => { 
                        this.posts = response.data.post;
                        this.loge_in_auth = response.data.auth;
                        

                    })
                    .catch(errors => {
                        console.log(errors);
                    });
            }
          }

    }
</script>