$(document).ready(function(){
    $('.product-sorting_btn').click(function(){
        let orderBy=$(this).data('order')

        $.ajax({
            url:"http://127.0.0.1:8000/games",
        type:'get',
            data:{
                orderBy:orderBy
        },
        headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:(data)=>{
                console.log(data)
                $('.features_items').html(data)
        }
        });
    })
})
