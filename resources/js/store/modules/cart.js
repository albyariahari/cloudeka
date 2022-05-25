const cart = {
    state: () => ({
        cart: [],
        total: 0,
    }),
    methods: {
        
    },
    mutations: {
        setTotal(state, value) {
            state.total = value;
        },
        setCart(state, value){
            state.cart = value;
        },
        addToCart(state, value){
            state.cart.push(value);
            console.log('Add To Cart');
            console.log(state.cart);
            console.log(state.cart[0].component['flavor'].list_items);
            console.log('end of Add To Cart');
        },
        updateCart(state, value){
            state.cart[value.cart_index].component = value.component;
            console.log('Update Cart');
            console.log(state.cart);
            console.log('end of Update Cart');
        },
        calculatePrice(state) {
            state.total = 0;
            let quantityName = 'quantity';
            for(const cartItem in state.cart){
                quantityName = state.cart[cartItem].component.quantityName;
                state.total += state.cart[cartItem].component[quantityName].value * state.cart[cartItem].component[quantityName].subtotal;
				console.log('Calculate Price Looping ', cartItem);
			}
        },
        deleteEstimation(state, index) {
            state.cart.splice(index, 1);
            // state.total -= subtotal;
        },
        decreaseTotal(state, subtotal) {
            state.total -= subtotal;
        }
    },
    getters: {
        getTotal(state) {
            return state.total;
        },
        getCart(state) {
            return JSON.parse(JSON.stringify(state));
        }
    }
}

export default cart;