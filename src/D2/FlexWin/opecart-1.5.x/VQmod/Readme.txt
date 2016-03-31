This module version (opc_fw_vqm_3.0.1) 
for DIBS FlexWin (D2).
To use this module you must have vqmod
installed, also seo url's must be enabled in 
your Opencart. 

To make your Opencart handle url's that 
this module require we have vqmod/xml/dibsfw_urls.xml
modification file. During installation of this module copy 
this xml file to other of your mods files. 

If you already have mod files that affect this source
'catalog/controller/common/seo_url.php' then better 
combine content of vqmod/xml/dibsfw_urls.xml with your mods.

After all you need to have in your folder: vqmod/vqcache
modified source 'catalog/controller/common/seo_url.php' 
with changes declared in vqmod/xml/dibsfw_urls.xml.

DIBS FlexWin accept ONLY clean urls, please look here:
http://tech.dibspayment.com/D2/FlexWin/Hosted/Input_parameters/Standard_parameters
You cannot use parameters in the URL. Example. ”?X=4&Y=2” The URLs have to be ”clean".
Example:
accepturl = "http://www.yourDomain.com/acceptedPayment?var1=YES&var2=JohnDoe"
If the payment is accepted, then the customer will be redirected to
"http://www.yourDomain.com/acceptedPayment" 
 