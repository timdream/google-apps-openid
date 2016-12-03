<?php

/* 
 * Google App hosted OpenID discovery information.
 *
 * ref: http://groups.google.com/group/google-federated-login-api/web/openid-discovery-for-hosted-domains
 *
 * ~timdream
 *
 */

if (!isset($_GET['id']) || preg_match('/^\d+$/', $_GET['id']) !== 1) {
	header("HTTP/1.0 400 Bad Request");
	header('Content-Type: text/plain');
	print '400 Bad Request';
	exit;
}

/* This XRD is shorter than described in the doc since we don't sign the XML */

header('Content-Type: application/xrds+xml');
print '<?xml version="1.0" encoding="UTF-8"?>';

?>

<xrds:XRDS xmlns:xrds="xri://$xrds" xmlns="xri://$xrd*($v*2.0)">
  <XRD>
  <CanonicalID>http://<?php print $_SERVER['HTTP_HOST']?>/openid?id=<?php print $_GET['id'] ?></CanonicalID>
  <Service priority="0">
  <Type>http://specs.openid.net/auth/2.0/signon</Type>
  <Type>http://openid.net/srv/ax/1.0</Type>
  <Type>http://specs.openid.net/extensions/ui/1.0/mode/popup</Type>
  <Type>http://specs.openid.net/extensions/ui/1.0/icon</Type>
  <Type>http://specs.openid.net/extensions/pape/1.0</Type>
  <URI>https://www.google.com/a/<?php print $_SERVER['HTTP_HOST']?>/o8/ud?be=o8</URI>
  </Service>
  </XRD>
</xrds:XRDS>

