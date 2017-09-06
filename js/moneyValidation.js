function displayNone()
{
    document.getElementById('err_message').innerHTML="";
}


function isMoneyValid()
{
    var amount=document.getElementById('check_amount').value;
    if((amount=="")||(amount=="Enter fuel"))
    {
        document.getElementById('error_addfuel').innerHTML="This information is required";
        document.getElementById('check_amount').focus();
        return false;
    }
    else if((amount<=1)||(amount>5000))
    {
        document.getElementById('error_addfuel').innerHTML="Amount should be more than 30 and less than 5000 Rs";
        document.getElementById('check_amount').focus();
        return false;
    }
    else if(isNaN(amount))
    {
         
        
        document.getElementById('error_addfuel').innerHTML="This information should be number";
        document.getElementById('check_amount').focus();
        return false;
    }
    else
    {
        if(0==amount%1)
        {
            
        
        document.getElementById('check_amount').style.disabled=true;
        //document.getElementById('err_message').innerHTML="Make sure that you clicked CONFIRM";
        }
        else
        {
            document.getElementById('error_addfuel').innerHTML="Only multiples of 10 are allowed";
            document.getElementById('check_amount').focus();
            return false;
        }
    }
    
    
}
