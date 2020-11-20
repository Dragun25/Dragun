define([
    'jquery',
    'domReady!'
], function ($) {
    'use strict';
    console.log("Called this Hook.");


    $(document).on('change',"[name='delivery_select']",function(){
        // alert("Hi");
        let test = $("[name='delivery_select']").val();
        // document.getElementById('delivary-text').innerHTML = test;
        $('#delivary-text').html(test);
    });
    // $(document).ready(function () {
    //     let selectedValue = $(this).val();
    //     console.log(selectedValue);
    //     $("[name= 'delivery_select']").on('change',function () {
    //         // let selectedValue = $(this).val();
    //         $('#delivary-text').html(selectedValue);
    //         console.log(selectedValue);
    //     })
    // })

    return function (targetModule) {
        targetModule.crazyPropertyAddedHere = 'yes';
        return targetModule;
    };
});
