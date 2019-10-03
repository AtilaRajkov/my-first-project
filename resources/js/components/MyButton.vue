<template>
    <div>
        <button :type="type" class="mu-button" v-text="test.name"></button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.');

            axios.post('api/vue', {})
                .then(response => {
                    this.test = response.data;
                });
        },

        data: function() {
            return {
                test: null,
            }
        },

        props: [
            'text',
            'type'
        ]
    }
</script>

<style>
    .mu-button {
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        font-weight: bold;
        /*border:none;*/
        /*border-radius: 7px;*/
    }
</style>