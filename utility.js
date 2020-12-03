function createXMLHttpRequest(){
  if(window.XMLHttpRequest)
    return new XMLHttpRequest();
  else if(window.ActiveXObject){
    var XMLVersions = ["MSXML2.XMLHttp.5.0", "MSXML2.XMLHttp.4.0",
                      "MSXML2.XMLHttp.3.0", "MSXML2.XMLHttp","Microsoft.XMLHttp"];
    for(var i = 0;i < XMLVersions.length;i++){
      try{
        return new ActiveXObject(XMLVersions[i]);
      }
      catch(error){
        //noting
      }
    }
  }
}
//使用 Ajax 可用 var XHR = createXMLHttpRequest();
