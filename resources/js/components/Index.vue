<template>
    <div class="card-body">
        <table class="table">
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
                    <a :href="'information/'+info.id+'/edit'" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                    <a :href="'information/'+info.id+'/edit'" class="btn btn-dark btn-sm text-white"><i class="fa fa-edit"></i></a>
                    <a @click.prevent="deleteUser(info.id)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data(){
        return{
            infos:{}
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
        }
    },
    created() {
        this.getInformation();
    }
}
</script>

<style scoped>

</style>
