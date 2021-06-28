
function get_user_info(){
    
    $.post('checksession.php').done(function(data){
        if(data != 'Кабінет'){
            $('.user-info').remove();
            $('.user-info-main').append('<li class="user-info main-nav">' + '<a>'+ data +'</a>'+ '</li>');
            $('.user-info-main').append('<li class="user-info main-nav ">' + '<a href="logout.php">'+ 'Вихід'+'</a>' + '</li>');
           
        }
        else {
            $('.user-info').remove();
            $('.user-info-main').append('<li class="user-info main-nav ">' + '<a href="authorize.php">'+ 'Кабінет'+'</a>' + '</li>');
        }
    });

   
        get_user_info();

 




