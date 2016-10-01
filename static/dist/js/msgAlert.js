function msgAlert(type, title,message){//types: success, info, warning and danger
    var d = $.now();
    console.log($.now());
    $(".content-header").append($("<div />", {id: 'msgAlert'+d,class:'alert alert-'+type+' alert-dismissible'}));
    $("#msgAlert"+d).css({
        marginTop: '2px',
        marginBottom: '2px',
        
    });
    $("#msgAlert"+d).append($("<button />", {type:"button", class:"close", 'data-dismiss':"alert", 'aria-hidden':"true"}));
    $("#msgAlert"+d+" button").append("x");
    $("#msgAlert"+d).append("<h4 />");
    switch(type) {
    case 'success':
        $("#msgAlert"+d+" h4").append($("<i />",{class:'icon fa fa-check'}));
        break;
    case 'warning':
        $("#msgAlert"+d+" h4").append($("<i />",{class:'icon fa fa-warning'}));
        break;
    case 'info':
        $("#msgAlert"+d+" h4").append($("<i />",{class:"icon fa fa-info"}));
        break;
    case 'danger':
        $("#msgAlert"+d+" h4").append($("<i />",{class:"icon fa fa-ban"}));
        break;
    default:
        $("#msgAlert"+d+" h4").append($("<i />",{class:"icon fa fa-info"}));
        break;
        
    }
    $("#msgAlert"+d+" h4").append(title);
    $("#msgAlert"+d).append(message);
    $("#msgAlert"+d+" button").focus();
    
    }


/*<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                Danger alert preview. This alert is dismissable. A wonderful serenity has taken possession of my entire
                soul, like these sweet mornings of spring which I enjoy with my whole heart.
              </div>*/