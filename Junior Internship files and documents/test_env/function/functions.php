<?php




function getOAuthCredentialsFile()
{
  // oauth2 creds
  $oauth_creds = 'Json/oauth-credentials.json';

  if (file_exists($oauth_creds)) {
    return $oauth_creds;
  }

  return false;
}


function cookie(){
  $cookie_Name = 'table';
  $aver = 'taco';

}