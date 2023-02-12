<template>
    <div class="form-group col-9">
        <label>Добавьте адрес</label>
        <div class="switcher mb-3">
            <div :class="left ? 'active' : ''" class="switch-to-left" @click="left = !left; right = !right">Карта</div>
            <div :class="right ? 'active' : ''" class="switch-to-right" @click="right = !right; left = !left">Адрес</div>
        </div>
        <div v-show="right" class="form-group">
            <input v-model="address" class="form-control" id="adress">
        </div>
        <div id="map" style="width:100%; height:300px;"></div>
        <input id="point" type="hidden" name="point">
    </div>
</template>

<script>
import {setAddress} from "../../../main";
export default {
    name: "OrderMap",
    data() {
        return {
            left: true,
            right: false,
            address: null,
            time_from: null,
            time_to: null
        }
    },
    methods: {

    },
    watch: {
        address: function (val) {
           setAddress(val)
        }
    },
    mounted() {

    }
}
</script>

<style scoped>
    .switcher {
        display: flex;
        cursor: pointer;
    }

    .switcher div {
        background: #f0f0f0;
        font-weight: bold;
        padding: 10px 25px;
        transition: all 0.7s ease;
    }

    .switcher div:hover:not(.active) {
        background: #dedede;
        font-weight: bold;
        padding: 10px 25px;
    }

    .switcher .active {
        background: #007bff;
        color: white
    }
</style>
