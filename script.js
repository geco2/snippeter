if (typeof window.toolbar !== "undefined") {
  let PAGE_TITLE = JSINFO.id.replace(JSINFO.namespace,"").replaceAll("_"," ");
  if (PAGE_TITLE.startsWith(":")) {
    PAGE_TITLE = PAGE_TITLE.replace(":","");
  }
  const date = new Date();
  let CURRENT_DATE = date.toISOString().split("T")[0];
  let CURRENTDATE = CURRENT_DATE.replaceAll("-","");
  let CURRENT_DATE_UNDERSCORE = CURRENT_DATE.replaceAll("-","_");
  let CURRENT_DATE_DASH = CURRENT_DATE.replaceAll("-","/");
  let CURRENT_DATE_LOCALE = date.toLocaleDateString();

  for(but of toolbar) {
    if(but.id && but.id.startsWith("Snippeter")) {
      for(snippets of but.list){
        let text_content = snippets.open;
        text_content = text_content.replace("<PAGE_TITLE>",PAGE_TITLE);
        text_content = text_content.replaceAll("<CURRENT_DATE>",CURRENT_DATE);
        text_content = text_content.replaceAll("<CURRENTDATE>",CURRENTDATE);
        text_content = text_content.replaceAll("<CURRENT_DATE_UNDERSCORE>",CURRENT_DATE_UNDERSCORE);
        text_content = text_content.replaceAll("<CURRENT_DATE_DASH>",CURRENT_DATE_DASH);
        text_content = text_content.replaceAll("<CURRENT_DATE_LOCALE>",CURRENT_DATE_LOCALE);
        snippets.open = text_content;
      }
    }
  }
}

