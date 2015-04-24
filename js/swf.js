function CreateFlash(idad, swfurl, ws, hs)
{
var str = '<embed src="'+swfurl+'" type="application/x-shockwave-flash" height="'+hs+'" width="'+ws+'" id="'+idad+'" name="ZyadsFlashAd" quality="high" wmode="opaque"  allowscriptaccess="always" ></embed>';
document.write(str);
}