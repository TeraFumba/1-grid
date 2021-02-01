<template>
    <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create a New Post</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                    <div class="form-group">
                        <label>Post</label>
                        <textarea class="form-control" rows="3" v-model="Post.post" placeholder="Enter ..."></textarea>
                        <small v-if="errors['post']" class="form-text text-danger">{{errors['post'][0]}}</small>
                      </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" @click="save()" class="btn btn-primary float-right">Submit</button>
                </div>
            </div>
            <!-- /.card -->
    </div> 
</template>

<script>
    export default {
        name: 'edit-post',
        props:['post'],
        data(){
            return{
                Post: this.post,
                post_id: null,
                errors: {}
            }
        },

        methods: {
           
            save(){
                   axios.put('/save_edit_post', {
                        post: this.Post,
                    }).then(response => { 
                        if(response.data == 'success'){
                            this.$swal('Success!' , 'You have successfully edited your post. ','success')
                            .then(function() {
                                window.location.href = '/home';
                            })
                        }

                    }).catch( error => {
                        if(error.response)
                            this.errors = error.response.data.errors
                    })
            }
        },
    }
</script>