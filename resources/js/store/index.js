import { createStore } from 'vuex'
import cart from './modules/cart'
// import deploy from './modules/deploy'
// import bucket from './modules/bucket'
// import safe from './modules/safe'
// import premium from './modules/premium'
// import priority from './modules/priority'
// import calculator from './modules/calculator'

export default createStore({
  modules: {
    cart,
    // deploy,
    // bucket,
    // safe,
    // premium,
    // priority,
    // calculator
  },
})
