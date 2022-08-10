const stripHtmlAndReturnText = htmlString =>
  htmlString.replace(/(<([^>]+)>)/gi, "");

export { stripHtmlAndReturnText };
