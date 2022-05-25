<template>
    <div class="quantity" :class="disabled ? 'quantity__untoggle' : 'quantity__toggle'">
        <button type="button" @click="decrement" class="btn quantity__decrement" :disabled="disabled">-</button>
        <input type="text" class="quantity__value" :value="quantity" :disabled="disabled" readonly>
        <button type="button" @click="increment" class="btn quantity__increment" :disabled="disabled">+</button>
    </div>
</template>

<script>
export default {
    props : ['disabled','quantity'],
    methods :{
        increment () {
            this.$emit("updateQuantity", this.quantity + 1);
        },
        decrement () {
            if(this.quantity === 0) {
                alert('Negative quantity not allowed')
            } else {
                this.$emit("updateQuantity", this.quantity - 1);
            }
        }
    }
}
</script>
