CSS Flow Layout
Normal Flow, or Flow Layout, is the way that Block and Inline elements are displayed on a page before any changes are made to their layout. The flow is essentially a set of things that are all working together and know about each other in your layout. Once something is taken out of flow it works independently.

In normal flow, inline elements display in the inline direction, that is in the direction words are displayed in a sentence according to the Writing Mode of the document. Block elements display one after the other, as paragraphs do in the Writing Mode of that document. In English therefore, inline elements display one after the other, starting on the left, and block elements start at the top and move down the page.







Position layout
The position CSS property sets how an element is positioned in a document. The top, right, bottom, and left properties determine the final location of positioned elements.


Syntax
position: static;
position: relative;
position: absolute;
position: fixed;
position: sticky;

 Global values 
position: inherit;
position: initial;
position: revert;
position: revert-layer;
position: unset;


Types of positioning

Relative positioning
Relatively positioned elements are offset a given amount from their normal position within the document, but without the offset affecting other elements. In the example below, note how the other elements are placed as if "Two" were taking up the space of its normal location.


Absolute positioning
Elements that are relatively positioned remain in the normal flow of the document. In contrast, an element that is absolutely positioned is taken out of the flow; thus, other elements are positioned as if it did not exist. The absolutely positioned element is positioned relative to its nearest positioned ancestor (i.e., the nearest ancestor that is not static). If a positioned ancestor doesn't exist, it is positioned relative to the ICB, which is the containing block of the document's root element.


Fixed positioning
Fixed positioning is similar to absolute positioning, with the exception that the element's containing block is the initial containing block established by the viewport, unless any ancestor has transform, perspective, or filter property set to something other than none (see CSS Transforms Spec), which then causes that ancestor to take the place of the elements containing block. This can be used to create a "floating" element that stays in the same position regardless of scrolling. In the example below, box "One" is fixed at 80 pixels from the top of the page and 10 pixels from the left. Even after scrolling, it remains in the same place relative to the viewport. Also, when the will-change property is set to transform, a new containing block is established.


Sticky positioning
Sticky positioning can be thought of as a hybrid of relative and fixed positioning when its nearest scrolling ancestor is the viewport. A stickily positioned element is treated as relatively positioned until it crosses a specified threshold, at which point it is treated as fixed until it reaches the boundary of its parent. 