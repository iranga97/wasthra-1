const productId = document.getElementById('product_id');
const productName = document.getElementById('product_name');
const quantity = document.getElementById('quantity');
const colors = document.getElementById('color');
const description = document.getElementById('description');
const image = document.getElementById('image');

const editform = document.getElementById('addFrom');


editform.addEventListener('submit', function(event) {

    event.preventDefault();
    if (
        validateProductId() &&
        validateproductName() &&
        validateColors() &&
        validateQuantity() &&
        validateDescription() &&
        validateSingleSize() &&
        validateIsPublished() &&
        validateIsNew() &&
        validateIsFeatured() &&
        validatePriceCategory() &&
        validateProductCategory() &&
        validateImage()

    ) {
      editform.submit();
    }
  });

  function validateProductId() {

    if (checkIfEmpty(productId)) return;

    if (!containsCharacters(productId,8)) return;
    return true;

}

function validateproductName() {
    
    if (checkIfEmpty(productName)) return;
    return true;

}

function validateColors() {
    
  if (checkIfEmpty(colors)) return;
  
  if (!containsCharacters(colors,9)) return;
  return true;

}

function validateQuantity() {

  if (checkIfEmpty(quantity)) return;

  if (!checkIfOnlyNumbers(quantity)) return;
  return true;

}

function validateDescription() {
    
  if (checkIfEmpty(description)) return;
  return true;

}

function validateSingleSize() {
        
  if (document.getElementById('XS').checked==true || 
  document.getElementById('S').checked==true || 
  document.getElementById('M').checked==true ||
  document.getElementById('L').checked==true ||
  document.getElementById('XL').checked==true) return true;
      setinvalidWithoutColor(document.getElementById('size-field'),'Must be selected');
      return false;
}

function validateIsPublished(){
  if(document.getElementById('is_published').value!="0") return true;
  setinvalidWithoutColor(document.getElementById('is_published'),'Must be selected');
      return false;
}

function validateIsNew(){
  if(document.getElementById('is_new').value!="0") return true;
  setinvalidWithoutColor(document.getElementById('is_published'),'Must be selected');
      return false;
}

function validateIsFeatured(){
  if(document.getElementById('is_featured').value!="0") return true;
  setinvalidWithoutColor(document.getElementById('is_published'),'Must be selected');
      return false;
}

function validatePriceCategory(){
  if(document.getElementById('price_category').value!="0") return true;
  setinvalidWithoutColor(document.getElementById('price_category'),'Must be selected');
      return false;
}

function validateProductCategory(){
  if(document.getElementById('category').value!="0") return true;
  setinvalidWithoutColor(document.getElementById('category'),'Must be selected');
      return false;
}

function validateImage(){
  
  if (checkIfEmpty(image)) return;
  // if(document.getElementById('image').value!=NULL) return true;
  // setinvalidWithoutColor(document.getElementById('image'),'Must be selected');
       return true;
}