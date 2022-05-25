<template>
    <div class="quantity" :class="disabled ? 'quantity__untoggle' : 'quantity__toggle'">
        <button type="button" @click="decrement" class="btn quantity__decrement" :disabled="disabled">-</button>
        <input type="number" class="quantity__value" :value="quantity" :disabled="disabled" :readonly="readonly" :min="min" :max="max" @blur="keyup($event)">
        <button type="button" @click="increment" class="btn quantity__increment" :disabled="disabled">+</button>
    </div>
</template>

<script>
export default {
    props : [
        'disabled',
        'modelNameProduct',
        'itemObject',
        'initValue'
    ],
    data(){
        return{
            quantity: 0,
            min: 0,
            max: 0,
            readonly: true
        }
    },
    watch:{
        quantity :function(val){
            this.$emit('updateQuantity', this.modelNameProduct, this.itemObject.slug, val);
        },
        initValue: function(val){
            if(val !== this.quantity){
                this.quantity = val;
                console.log("Init Value has Changed");
            }
        }
    },
    methods :{
        increment () {
            if(this.quantity < this.max){
                if(this.itemObject.rule_must_be_even){
                    this.quantity += 2;
                }else{
                    this.quantity++
                }
            }else{
                alert('Max quantity is '+this.max);
            }     
        },
        decrement () {
            if(this.quantity === 0 || this.quantity === this.min) {
                alert('Minimum quantity is '+this.min);
            } else {
                if(this.itemObject.rule_must_be_even){
                    this.quantity -= 2;
                }else{
                    this.quantity--
                }
            }
        },
        keyup(event){
            this.quantity = event.target.value;
            if(this.quantity < this.min) {
                alert('Minimum quantity is '+this.min);
                this.quantity = this.min
            }else if(this.quantity > this.max){
                alert('Max quantity is '+this.max);
                this.quantity = this.max
            }
        }
    },
    created: function(){
        this.quantity = this.itemObject.value;
        this.min = this.itemObject.rule_min_value;
        this.max = this.itemObject.rule_max_value;
        this.readonly = (this.itemObject.data_type === 'integer-free-input' ? false : true);

        if(this.itemObject.slug === 'persistant-volume')
            this.readonly = false;

        if(this.quantity <= this.min)
            this.quantity = this.min;
        else if(this.quantity > this.max)
            this.quantity = this.max;
    }
}
</script>
