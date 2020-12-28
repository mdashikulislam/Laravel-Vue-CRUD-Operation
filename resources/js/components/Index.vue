<template>
    <div class="card-body">
        <input @keyup="searchItem" type="text" class="form-control" placeholder="Search by anything..." v-model="search">
        <table class="table mt-2">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(info,index) in infos" :key="index">
                <th scope="row">{{index+1}}</th>
                <td>{{info.fname}}</td>
                <td>{{info.lname}}</td>
                <td>{{info.email}}</td>
                <td>{{info.phone}}</td>
                <td>
                    <a @click.prevent="viewItem(info)" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye"></i></a>
                    <a :href="'information/'+info.id+'/edit'" class="btn btn-dark btn-sm text-white" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                    <a @click.prevent="deleteUser(info.id)" class="btn btn-danger btn-sm"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                       <div class="row">
                           <div class="col">
                               <label for="fname">First Name:</label>
                               <input id="fname" v-model="form.fname" type="text"  disabled class="form-control">
                           </div>
                           <div class="col">
                               <label for="lname">Last Name:</label>
                               <input id="lname" v-model="form.lname" type="text"  disabled class="form-control">
                           </div>
                       </div>
                        <div class="row mt-2">
                            <div class="col">
                                <label for="email">Email:</label>
                                <input id="email" v-model="form.email" type="text"  disabled class="form-control">
                            </div>
                            <div class="col">
                                <label for="phone">Phone:</label>
                                <input id="phone" v-model="form.phone" type="text"  disabled class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <label for="gender">Gender:</label>
                                <input id="gender" v-model="form.gender" type="text"  disabled class="form-control">
                            </div>
                            <div class="col">
                                <label for="hobbies">Hobbies:</label>
                                <input id="hobbies" v-model="form.hobbies" type="text"  disabled class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <label for="bio">Short Description:</label>
                                <textarea id="bio" v-model="form.bio" type="text"  disabled class="form-control"></textarea>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            infos:{},
            search:'',
            form:new Form({
                fname:'',
                lname:'',
                email:'',
                phone:'',
                gender:'',
                hobbies:'',
                bio:'',
            })
        }
    },
    methods:{
        getInformation(){
            axios.get('/api/information').then((data)=>{
                this.infos = data.data;
            }).catch(()=>{});
        },
        deleteUser(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$Progress.start();
                    axios.delete('/api/information/'+id).then(()=>{
                        this.getInformation();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                        this.$Progress.finish();
                    }).catch((error)=>{
                        this.$Progress.finish();
                    });
                }
            })
        },
        searchItem(){
            if (this.search.length === 0){
                this.loadAllInformation();
            }else{
                axios.post('/api/search',{item:this.search}).then((response)=>{
                    this.infos = response.data;
                }).catch();
            }

        },
        loadAllInformation(){
            axios.get('/api/information').then((response)=>{
                this.infos = response.data;
            }).catch((error)=>{

            });
        },
        viewItem(info){
            this.form.fill(info);
            $('#exampleModal').modal('show');
        }
    },
    created() {
        this.getInformation();
    }
}
</script>

<style scoped>

</style>
