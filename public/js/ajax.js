$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('select[name=make_id]').on('change',function () {
        const id=$(this).val();
        let sub = document.getElementById('models_id');
        for (let i =0;i < models.length;i++){

            if(models[i].id == id && models[i].models.length){

                sub.removeAttribute('disabled');
                sub.innerHTML = `<option value="">Choose Model</option>`;
                for (let f =0;f < models[i].models.length;f++)
                {
                    let option = `<option value="${models[i].models[f].id}">${models[i].models[f].title}</option>`;
                    sub.innerHTML += option;
                }
                break;
            }else {
                sub.innerHTML = `<option value="" selected>Choose Model</option>`;
                sub.setAttribute('disabled',true)
            }
        }
    })
    $('select[name=seller_id]').on('change',function () {
        const id=$(this).val();
        let sub = document.getElementById('cars_id');

        for (let i =0;i < cars.length;i++){
            console.log(cars)
            if(cars[i].id == id && cars[i].models.length){
                sub.removeAttribute('disabled');
                sub.innerHTML = ``;
                for (let f =0;f < cars[i].models.length;f++)
                {
                    let option = `<option value="${cars[i].models[f].id}">${cars[i].models[f].makes.title +' '+cars[i].models[f].makes_models.title+' '+cars[i].models[f].year }</option>`;
                    sub.innerHTML += option;
                }
                break;
            }else {
                sub.innerHTML = ``;
                sub.setAttribute('disabled',true)
            }
        }
    })
const WebSocket = require('ws');
const wss = new WebSocket();
    wss.on('connection', ws =>{
        console.log('connection')
        ws.on('close',()=>{
            console.log("client discontected")
        })
    })
});

