<html>
    <body>
        <p></p>
        <p>{{$email->mensagem}}</p>
        <center><img src="{{ $message->embed(public_path('/imagens/gov.png')) }}"></center>
        <p>Caso tenha recebido este email por engano, por favor contacte Edsongomex@gmail.com</p>
    </body>
</html>