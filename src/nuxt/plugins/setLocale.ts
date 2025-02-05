import { setLocale } from 'yup'

export default defineNuxtPlugin(() => {
    setLocale({
        mixed: {
            required: "この項目は必須です",
        },
        string: {
            email: "メールアドレスの形式ではありません。",
            min:({ label }) => `${label}文字以上で入力してください`
        },
    });
})