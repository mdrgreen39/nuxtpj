<template>
<form @submit.prevent="register">
<input type="text" v-model="name" placeholder="name" required />
<input type="email" v-model="email" placeholder="email" required />
<input type="password" v-model="password" placeholder="password" required />
<button type="submit">送信</button>
</form>
</template>

<script>
export default {
auth: false,
data() {
return {
name: null,
email: null,
password: null,
};
},
methods: {
async register() {
try {
await this.$axios.post("http://localhost:8000/api/auth/register", {
name: this.name,
email: this.email,
password: this.password,
});
this.$router.push("/login");
} catch {
alert("メールアドレスがすでに登録されています");
}
},
},
};
</script>