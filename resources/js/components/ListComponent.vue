<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
               <table class="table">
                   <tr>
                       <th>Id</th>
                       <th>Name</th>
                       <th>Bedrooms</th>
                       <th>Bathrooms</th>
                       <th>Storeys</th>
                       <th>Garages</th>
                       <th>Price</th>
                   </tr>
                   <tr v-if="hasData" v-for="data in row">
                       <td>{{row.id}}</td>
                       <td>{{row.name}}</td>
                       <td>{{row.bedrooms}}</td>
                       <td>{{row.bathrooms}}</td>
                       <td>{{row.storeys}}</td>
                       <td>{{row.garages}}</td>
                       <td>{{row.price}}</td>
                   </tr>
                   <tr v-else >
                       no data
                   </tr>

               </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['operations'],

        data() {
            return{
                data:[]
            }
        },
        computed: {
            hasData: function () {
                return this.data.length > 0;
            }
        }

    }
</script>
