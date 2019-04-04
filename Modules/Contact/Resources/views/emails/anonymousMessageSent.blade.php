<h1>Hello {{ $sender }} !</h1>
<p>Merci pour votre demande de contact.</p>
<p>Nous allons tenter de vous recontacter, soit par téléphone au numéro {{ $phone }}, soit 
par courriel à l'adresse {{ $email }}.</p>
<p>L'objet de votre message est "{{ $subject }}", et vous nous avez envoyé, depuis l'adresse IP suivante :{{ $ip }}, le message suivant&nbsp;:</p>
<pre>{{ $body }}</pre>
<p>Au nom de l'équipe d'Eutranet, nous vous remercions pour votre demande.</p>