function validasi()
{
	var email = document.getElementById("email").value;
	var password = document.getElementById("password").value;		
	if (email != "" && password!="") {
		return true;
	}else{
		alert('Email dan Password Harus di isi lengkap !');
		return false;
	}
}
function validasireg()
{
        var email = document.getElementById("email").value;
        var name = document.getElementById("nama").value;
	var password = document.getElementById("password").value;
        if (email != "" && password!="" && name!= "") {
                return true;
        }else{
                alert('Nama Email dan Password Harus Di Isi !');
                return false;
        }
}
