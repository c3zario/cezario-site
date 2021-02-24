<?php
include './connect.php';

//echo '<p>Status połączenia: <b>'.( $sql->getAttribute( PDO::ATTR_CONNECTION_STATUS ) ).'</b></p>';
//$b[3];
$i = 0;

// if($_POST) {
//     $sql->exec( 'INSERT INTO tab SET login = "a", pass = "b"' );
    
// }
//$sql->exec( 'INSERT INTO tab SET login = "a", pass = "b"' );
$a = $sql->query( 'SELECT * FROM tab' ) ?: die('Nie udało się pobrać rekordów');
//foreach( $a as $r ) {$b[$i] = $r; $i++;};
// while( $r = $a->fetch( PDO::FETCH_ASSOC ) ) {$b[$i] = $r; $i++;};
// echo '<pre>'.print_r($b,1).'</pre>';
// print json_encode($b);

// echo '<pre>'.print_r($b,1).'</pre>';
$json = json_encode($a->fetchAll( PDO::FETCH_ASSOC ));
// echo $json;

?>

<div id="imie"></div>

<script>
j=0;
one = 1;
idk = 1;
    var stuff = <?php print json_encode($json); ?>;
    var arr = new Array();
    arr= JSON.parse(stuff);
    //document.write(stuff);
    // console.log(stuff);
    // console.log(stuff[0]);
    console.log(arr[0].pass);

    // var html = '<table><tr><td></td></tr></table>';
    var html = '<table border><tbody>';
    for(var i=0;i<arr.length;i++) {
                html += '<tr id="'+arr[j].id+'"><td>' + (j+1) + '</td><td><input value="' + arr[j].id + '" disabled></td>' + '<td><input id="id'+one+'" value="' + arr[j].login + '" name="'+idk+'" data-action="edit"></td>' + '<td><input id="id'+(one+1)+'" value="' + arr[j].pass + '" name="'+(idk+1)+'" data-action="edit"></td><td><button data-action="dup">duplikuj</button></td><td><button data-action="del">x</button></td><td><button data-action="add">+</button></td></tr>';
                j++;
                one +=2;
                idk +=2;
    }
    html += '</tbody></table>';


    document.write(html);


    document.querySelector('table').addEventListener( 'input', klik);
    document.querySelector('table').addEventListener( 'click', klik);

    function klik( e ) {
        console.log(e.srcElement);
        getName = e.srcElement.getAttribute('name');
        getVal = e.srcElement.value;
        getId = e.srcElement.parentElement.parentElement.getAttribute('id');
        console.log(getId);
        getAct = e.srcElement.getAttribute('data-action');

        switch(getAct)
        {
        case 'dup':
            //document.querySelector('tbody').insertAdjacentElement("beforeend", document.getElementById(getId).cloneNode(true));
        break;
        case 'del':
            document.getElementById(getId).remove();
        break;
        case 'add':

        break;
        }

        fetch( 'odp.php?name=' +getName+ '&val=' +getVal+ '&id=' +getId+ '&action=' +getAct);

        fetch( 'odp.php?val=' + getVal)
        .then( odp => odp.json() )
        .then( v => {

                // document.querySelector('tbody').insertAdjacentHTML("beforeend", '<tr id="'+v[0][0]+'"><td>' + (j+1) + '</td><td><input value="' + v[0][0] + '" disabled></td>' + '<td><input id="id'+one+'" value="' + v[0][1] + '" name="'+idk+'" data-action="edit"></td>' + '<td><input id="id'+(one+1)+'" value="' + v[0][2] + '" name="'+(idk+1)+'" data-action="edit"></td><td><button data-action="dup">duplikuj</button></td><td><button data-action="del">x</button></td><td><button data-action="add">+</button></td></tr>');
                // j++;
                console.log(v);

        } );
    }


//     document.querySelectorAll('button').forEach( function(b) {

// b.addEventListener( 'click', function() {
//     //https://ms.zsem.edu.pl/zsem/3.%20Javascript/tabela.htm

//     //loader.innerHTML = '<img src="ajax-loader.gif">';
//     getVal = this.getAttribute("data-dval");
//     getVal2 = this.getAttribute("data-dval");

//     if(getVal.slice(-1) != "d") {
//         getVal += '|' + document.getElementById('id'+(getVal2.substring(0, getVal2.length - 1) * 2 - 1)).value;
//         getVal += '|' + document.getElementById('id'+(getVal2.substring(0, getVal2.length - 1) * 2)).value;
//         console.log(getVal);

//         fetch( 'odp.php?val=' + getVal);
//     } else {

//         console.log(getVal);

//     fetch( 'odp.php?val=' + getVal)
//         .then( odp => odp.json() )
//         .then( v => {

//               //loader.innerHTML = '  ';

//                 //imie.innerHTML = v[0];
//                 var h = document.getElementById("tb").insertAdjacentHTML("beforeend", '<tr><td><input value="' + (j+1) + '" name="id" disabled></td>' + '<td><input value="' + v[0][1] + '" name="login"></td>' + '<td><input value="' + v[0][2] + '" name="pass"></td><td><button dval="'+v[0][0]+'">duplikuj</button></td><td><button zval="'+j+'">zapisz</button></td></tr>');
//                 j++;
//             //nazwisko.innerHTML = v[1];
//                 //wiek.innerHTML = v[2];

//         } );
// }
// } );
// } );

// function evlist() {
//     document.querySelectorAll('button').forEach( function(b) {

// b.addEventListener( 'click', function() {

//     //loader.innerHTML = '<img src="ajax-loader.gif">';

//     fetch( 'odp.php?val=' + this.getAttribute("data-dval") )
//         .then( odp => odp.json() )
//         .then( v => {

//               //loader.innerHTML = '  ';

//                 //imie.innerHTML = v[0];
//                 var h = document.getElementById("tb").insertAdjacentHTML("beforeend", '<tr><td><input value="' + (j+1) + '" name="id"></td>' + '<td><input value="' + v[0][0] + '" name="login"></td>' + '<td><input value="' + v[0][1] + '" name="pass"></td><td><button dval="'+j+'">duplikuj</button></td><td><button zval="'+j+'">zapisz</button></td></tr>');
//                 j++;
//             //nazwisko.innerHTML = v[1];
//                 //wiek.innerHTML = v[2];

//         } );

//         evlist();
// } );
// } );
// }
// evlist();
</script>

<?php
/*
$html = '<meta charset="utf-8"><style>table { margin: 1em 0; }</style>';

try // próba połączenia z bazą danych
{
    if( $sql = new PDO( 'mysql:host=localhost;dbname=baza;encoding=utf8;port=3306', 'root', '' ) )
	{
		$html .= 'Połączono z bazą.<br>';
	}
}
catch( PDOException $e ) { die( $html . 'Nie połączono z bazą' ); }



// generowanie kodu html po stronie serwera:

$rekordy = $sql->query( 'select `imie`,`wiek` from `users`' );

$html .= '<table border>';

while( $r = $rekordy->fetch( PDO::FETCH_NUM ) )
{
	$html .= '<tr>'.
				'<td>'. htmlspecialchars( $r[0] ) .'</td>'.
				'<td>'. htmlspecialchars( $r[1] ) .'</td>'.
			'</tr>';
}

$html .= '</table>';



// generowanie kodu html po stronie klienta:

$rekordy = $sql->query( 'select `imie`,`wiek` from `users`' );

$html .= '

<script>

rekordy = '. json_encode( $rekordy->fetchAll( PDO::FETCH_NUM ) ) .';

html = `<table border>`;

for( var i=0; i<rekordy.length; ++i )
{
	html += `<tr>`+
				`<td>${rekordy[i][0]}</td>`+
				`<td>${rekordy[i][1]}</td>`+
			`</tr>`;
}

html += `</table>`;

document.body.insertAdjacentHTML( "beforeend", html );

</script>';



//

die( $html );
*/
?>