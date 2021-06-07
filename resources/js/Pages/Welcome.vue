<template>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <template v-if="$page.props.auth.user">
            <inertia-link :href="route('users.index')" class="text-sm text-gray-700 underline">
                Users
            </inertia-link>
            </template>
            <template v-else>
               <inertia-link :href="route('login')" class="text-sm text-gray-700 underline">
                    Log in
                </inertia-link>

                <inertia-link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
                    Register
                </inertia-link>
            </template>
        </div>

        
    </div>
 
</template>



<script>
    export default {
        props: {
            auth: Object,
            canLogin: Boolean,
            canRegister: Boolean,
            errors: Object,
        }
    }
</script>
