const app = Vue.createApp({
    data () {
        return {
            hotel_arr : []
        }
    },
    methods: {
        addHotel: function (data){
            this.hotel_arr.push(data);
            console.log(this.hotel_arr)
        }
    },
    created(){
        fetch('data.json')
        .then(response => response.json())
        .then (data => this.addHotel(data))
    }
}).mount('#app')

