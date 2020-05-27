var jourSelected = document.querySelector('#selectJour');
jourSelected.addEventListener('change', function(){
    document.querySelector('.choiceCreneau').style.visibility = 'visible';
})

// removes all option elements in select list 
// removeGrp (optional) boolean to remove optgroups
function removeAllOptions(sel) {
    var len, groups, par;
    groups = sel.getElementsByTagName('optgroup');
    len = groups.length;
    for (var i=len; i; i--) {
        sel.removeChild( groups[i-1] );
    }
    
    len = sel.options.length;
    for (var i=len; i; i--) {
        par = sel.options[i-1].parentNode;
        par.removeChild( sel.options[i-1] );
    }
}

function appendDataToSelect(sel, obj) {
    var f = document.createDocumentFragment();
    var labels = [], group, opts;
    
    function addOptions(obj) {
        var f = document.createDocumentFragment();
        var o;
        
        for (var i=0, len=obj.text.length; i<len; i++) {
            o = document.createElement('option');
            o.appendChild( document.createTextNode( obj.text[i] ) );
            
            if ( obj.value ) {
                o.value = obj.value[i];
            }
            
            f.appendChild(o);
        }
        return f;
    }
    
    if ( obj.text ) {
        opts = addOptions(obj);
        f.appendChild(opts);
    } else {
        for ( var prop in obj ) {
            if ( obj.hasOwnProperty(prop) ) {
                labels.push(prop);
            }
        }
        
        for (var i=0, len=labels.length; i<len; i++) {
            group = document.createElement('optgroup');
            group.label = labels[i];
            f.appendChild(group);
            opts = addOptions(obj[ labels[i] ] );
            group.appendChild(opts);
        }
    }
    sel.appendChild(f);
}

// anonymous function assigned to onchange event of controlling select list
document.forms['demoForm'].elements['category'].onchange = function(e) {
    // name of associated select list
    var relName = 'choices[]';
    
    // reference to associated select list 
    var relList = this.form.elements[ relName ];
    
    // get data from object literal based on selection in controlling select list (this.value)
    var obj = Select_List_Data[ this.value ];
    
    // remove current option elements
    removeAllOptions(relList);
    
    // call function to add optgroup/option elements
    // pass reference to associated select list and data for new options
    appendDataToSelect(relList, obj);
};

// object literal holds data for optgroup/option elements
var Select_List_Data = {
    
    // name of associated select list
    'choices[]': {
        
        // names match option values in controlling select list
        js: {
            // optgroup label
            'Free Scripts': {
                text: ['Slider Control', 'Scrollers', 'Banner Rotator'],
                value: ['slider', 'scrollers', 'banner']
            },
            'License': {
                text: ['Scrolling Divs', 'Tooltips', 'Rotate Images'],
                value: ['scroll', 'tooltips', 'rotate']
            }
        },
        php: {
            // example without optgroups
            text: ['Random Image', 'Rotate Images', 'Form Class', 'Table Class', 'Order Form'],
            value: ['random', 'rotate', 'form', 'table', 'order']
        },
        tuts: {
            'Download Demos': {
                // example without values
                text: ['Iframes', 'PHP to JS', 'Unobtrusive JS']
            },
            
            'No Download': {
                text: ['Object Literals', 'Initializing JS', 'JS Errors']
            }
        }
    }
    
};

// populate associated select list when page loads
window.onload = function() {
    var form = document.forms['demoForm'];
    
    // reference to controlling select list
    var sel = form.elements['category'];
    sel.selectedIndex = 0;
    
    // name of associated select list
    var relName = 'choices[]';
    // reference to associated select list
    var rel = form.elements[ relName ];
    
    // get data for associated select list passing its name
    // and value of selected in controlling select list
    var data = Select_List_Data[ sel.value ];
    
    // add options to associated select list
    appendDataToSelect(rel, data);
};



