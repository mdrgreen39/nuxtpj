<script setup>
import { useForm, useField } from 'vee-validate';
import * as yup from 'yup';

const schema = yup.object({
  name: yup.string().required("必ず入力してください").min(8).label("8"), //.label()を追加
  email: yup.string().required().email(),
});

useForm({ validationSchema: schema });

// 各フィールドをuseFieldで定義
const { value: name, errorMessage: nameError } = useField("name");
const { value: email, errorMessage: emailError } = useField("email");
</script>

<template>
  <h1>バリデーションサンプル</h1>
  <input type="text" v-model="name">
  <p>{{ nameError }}</p>
  <input type="text" v-model="email">
  <p>{{ emailError }}</p>
</template>