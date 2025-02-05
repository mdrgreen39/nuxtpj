<template>
<form @submit.prevent="login">
<input type="email" v-model="email" placeholder="email" required />
<input type="password" v-model="password" placeholder="password" required />
<button type="submit">送信</button>
</form>
</template>

<script>
export default {
data() {
return {
email: null,
password: null,
};
},
methods: {
async login() {
try {
await this.$auth.loginWith("laravelJWT", {
data: {
email: this.email,
password: this.password,
},
});
this.$router.push("/");
} catch {
alert("メールアドレスまたはパスワードが間違っております");
}
},
},
};
</script>