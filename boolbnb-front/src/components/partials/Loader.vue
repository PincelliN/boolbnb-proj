<script>

export default{
    name: 'Loader'
}
</script>

<template>
    <div id="loader-container">
        <span class="loader"></span>
    </div>
</template>

<style lang="scss" scoped>

#loader-container{
    min-height: 350px;
    margin: 0 auto;
    display: flex;
    justify-content: center;
    align-items: center;

    .loader {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: inline-block;
        border-top: 3px solid #000;
        border-right: 3px solid transparent;
        box-sizing: border-box;
        animation: rotation 1s linear infinite;
    }

    @keyframes rotation {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    } 
}


</style>