<template>
    <div class="card-body">
        <form @submit.prevent="updateInfo">
            <div class="row">
                <div class="col">
                    <label for="fname">First Name :</label>
                    <input v-model="form.fname" name="fname" id="fname" type="text" class="form-control" placeholder="First name" :class="{ 'is-invalid': form.errors.has('fname')}">
                    <has-error :form="form" field="fname"></has-error>
                </div>
                <div class="col">
                    <label for="lname">Last Name :</label>
                    <input v-model="form.lname" name="lname" type="text" id="lname" class="form-control" placeholder="Last name" :class="{ 'is-invalid': form.errors.has('lname')}">
                    <has-error :form="form" field="lname"></has-error>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="email">Email : </label>
                    <input v-model="form.email" name="email" type="email" class="form-control" id="email" placeholder="example@email.com" :class="{ 'is-invalid': form.errors.has('email')}">
                    <has-error :form="form" field="email"></has-error>
                </div>
                <div class="col">
                    <label for="phone">Phone</label>
                    <input v-model="form.phone" name="phone" type="text" class="form-control" id="phone" placeholder="01XXX-XXXXXX" :class="{ 'is-invalid': form.errors.has('phone')}">
                    <has-error :form="form" field="phone"></has-error>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="gender">Gender : </label>
                    <select v-model="form.gender" name="gender"  id="gender" class="form-control" :class="{ 'is-invalid': form.errors.has('gender')}">
                        <option value="">Select One</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <has-error :form="form" field="gender"></has-error>
                </div>
                <div class="col">
                    <label for="hobbies">Hobbies :</label>
                    <input v-model="form.hobbies" name="hobbies" type="text" id="hobbies" class="form-control" placeholder="Hobbies" :class="{ 'is-invalid': form.errors.has('hobbies')}">
                    <has-error :form="form" field="hobbies"></has-error>
                </div>
            </div>
            <div class="form-group">
                <label for="bio">Bio : </label>
                <textarea v-model="form.bio" name="bio"  id="bio" class="form-control" placeholder="Short Bio (Optional)" :class="{ 'is-invalid': form.errors.has('bio')}"></textarea>
                <has-error :form="form" field="bio"></has-error>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-success"><i class="fa fa-save fa-fw"></i>Update</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    props:['id'],
    data(){
        return{
            form : new Form({
                fname:'',
                lname:'',
                email:'',
                phone:'',
                gender:'',
                hobbies:'',
                bio:'',
            }),

        }
    },
    methods:{
        updateInfo(){
            this.$Progress.start();
            this.form.put('/api/information/'+this.id).then((response)=>{
                // console.log(response.data);

                this.$Progress.finish();
                Swal.fire({
                    title: 'Success!',
                    text: 'Information store successfully',
                    imageUrl: 'https://unsplash.it/400/200',
                    imageWidth: 400,
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                })
            }).catch(()=>{
                // console.log(errors);
                this.$Progress.finish();
            });
        },
        getSingleInformation(){
            this.$Progress.start();
            this.form.get('/api/information/'+this.id).then((response)=>{
                this.form.fill(response.data);
                this.$Progress.finish();
            }).catch((error)=>{
                this.$Progress.finish();
            });
        }
    },
    created() {
        this.getSingleInformation();
    }
}
</script>

<style scoped>
.col label{
    font-weight: bold;
    margin-top: 10px;
}
.form-group label{
    font-weight: bold;
    margin-top: 10px;
}
</style>
