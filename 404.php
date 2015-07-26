<?php
	$redirects = array(
		'/jak-zacit' => 'https://support.mozilla.org/cs/kb/instalace-thunderbirdu',
		'/media' => 'https://www.mozilla.org/cs/thunderbird/features/',
		'/otazky' => 'https://support.mozilla.org/cs/kb/podpora-komunity',
		'/otazky/klavesove-zkratky' => 'https://support.mozilla.org/cs/kb/klavesove-zkratky',
		'/proc-pouzivat' => 'https://www.mozilla.org/cs/thunderbird/features/',
		'/proc-pouzivat/enigmail' => 'https://support.mozilla.org/cs/kb/sifrovani-digitalni-podepisovani-zprav',
		'/proc-pouzivat/kalendar' => 'https://support.mozilla.org/cs/kb/pouziti-kalendare-lightning',
		'/stahnout/tapety' => 'https://addons.mozilla.org/cs/thunderbird/themes/',
		'/stahnout' => 'http://www.mozilla.cz/stahnout/thunderbird/',
	);

	$requestUri = filter_input(INPUT_SERVER, 'REQUEST_URI');
	$requestUri = str_replace('index.php', '', $requestUri);
	if($requestUri !== '/') {
		$requestUri = rtrim($requestUri, '/');
	}
	if(isset($redirects[$requestUri])) {
		header('HTTP/1.1 301 Moved Permanently');
		header(sprintf('Location: %s', $redirects[$requestUri]));
		header('Connection: close');
		exit;
	}

	require_once './inc/page.php';
	$page->setTitle('Dokument nenalezen / Document not found');
	$page->includeTemplate('header');
?>
<div class="main">

	<h1>Dokument nenalezen (404)</h1>

	<p>Tento dokument nebyl na serveru <a href="/"><?php echo $page->getWebName()?></a> nalezen.
	Zkontrolujte prosím, zds je jeho adresu zadaná správně.</p>
	<p>Domovská stránka serveru <a href="/"><?php echo $page->getWebName()?></a>.</p>

	<hr />

	<p lang="en">This document was not found on	<a href="/" hreflang="cs">Use Thunderbird</a>
	website. Please check if its location has been typed correctly.</p>
	<p lang="en">Homepage of <a href="/" hreflang="cs">Use Thunderbird</a> site.</p>

</div>

<div class="side"><div class="side-in">
	<hr />
	<h2>Navazující informace</h2>

	<h3 class="first">Doporučené servery</h3>

	<ul>
		<li><a href="http://www.mozilla.cz/">Mozilla.cz</a></li>
		<li><a href="http://www.mozilla-europe.org/cs/" hreflang="cs" lang="en">Mozilla Europe</a></li>
		<li><a href="http://cs.www.mozillamessaging.com/cs/" hreflang="cs" lang="en">Mozilla Messaging</a></li>
		<li><a href="http://www.mozilla.org/" hreflang="en" class="l-en" lang="en">Mozilla.org</a></li>
	</ul>

</div></div>
<div class="path">
	<hr />
	<p>
		<a href="/"><?php echo $page->getWebName()?></a> &gt;
		<strong>Dokument nenalezen</strong>
	</p>
</div>
<?php
	$page->includeTemplate('footer');
?>
