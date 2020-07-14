function setDisableIf(srcElement,srcAttr ,srcValue, targetElement){
    srcElement.on('change', function(){
        targetElement.prop('disabled', $(this).prop(srcAttr) == srcValue);
    });
    // srcElement.trigger('change');
    // alert('ok');
    srcElement.change();
}

function setHideIf(srcElement,srcAttr ,srcValue, targetElement){
    srcElement.on('change', function(){
        if($(this).prop(srcAttr) == srcValue)
            targetElement.hide();
        else
            targetElement.show();
    });
    srcElement.trigger('change');
    // alert('ok');
}