<template>
    <v-app>
            <v-row align="center">
                <v-col align="center">
                    <v-card class="ma-4" max-width="800">
                        <v-card-title>
                            Login
                        </v-card-title>
                        <v-form class="ma-4">
                            <v-text-field
                                label="Email"
                                outlined
                                v-model="email"
                            ></v-text-field>
                            <v-text-field
                                label="Password"
                                v-model="password"
                                :append-icon="showPwd ? 'mdi-eye' : 'mdi-eye-off'"
                                :type="showPwd ? 'text' : 'password'"
                                name="input-10-2"
                                class="input-group--focused"
                                @click:append="showPwd = !showPwd"
                                outlined
                            ></v-text-field>
                            <div class="d-flex flex-row-reverse pb-4">
                                <v-btn
                                    color="blue white--text"
                                >
                                    Register
                                </v-btn>
                                <v-btn
                                    color="blue white--text"
                                    class="mr-4"
                                    @click.prevent="loginHandle"
                                >
                                    Login
                                </v-btn>
                            </div>
                        </v-form>
                    </v-card>
                </v-col>
            </v-row>
            
    </v-app>
</template>

<script>
    export default {
        methods:{
            loginHandle(){
                window.axios.get('/sanctum/csrf-cookie').then(() => {
                    window.axios.post('api/login', {
                        email: this.email,
                        password: this.password
                    }).then(resp => {
                        console.log(resp)
                        window.axios.get('api/authenticated').then((r) => {
                            console.log(r)
                        })
                    })
                })
            }
        },
        data(){
            return {
                email: '',
                password: '',
                showPwd: false
            }
        }
    }
</script>

<style scoped>
.col, .row{
    padding: 0%;
    margin: 0%;
}
</style>