<!DOCTYPE html>
<html>
  <head>
    <title>Basic Pure CSS Accordion</title>
    <link href="1-raw.css" rel="stylesheet">
  </head>
  <body>
    


<style type="text/css">
  /* [THE ENTIRE TAB] */

  .tab-content {
  overflow: hidden;
  display: none;
}
.tab input:checked ~ .tab-content {
  display: block;
}

.tab {
  position: relative;
  margin: 2px;
  max-width: 600px;
}

/* [THE LABEL] */
.tab input {
  display: none;
}
.tab label {
  display: block;
  background: #2d5faf;
  color: #fff;
  font-weight: bold;
  padding: 10px;
  cursor: pointer;
}
.tab label::after {
  content: "\25b6";
  position: absolute;
  right: 10px;
  top: 10px;
  display: block;
  transition: all 0.4s;
}
.tab input[type=checkbox]:checked + label::after,
.tab input[type=radio]:checked + label::after {
  transform: rotate(90deg);
}

/* [THE CONTENTS] */
.tab-content {
  overflow: hidden;
  background: #ccdef9;
  /* CSS animation will not work with auto height */
  /* This is why we use max-height */
  transition: max-height 0.4s; 
  max-height: 0;
}
.tab-content p {
  margin: 20px;
}
.tab input:checked ~ .tab-content {
  /* Set the max-height to a large number */
  /* Or 100% viewport height */
  max-height: 100vh;
}

/* [DOES NOT MATTER] */
html, body {
  font-family: arial;
  background: #f2f2f2;
}
</style>



    <div class="tab">
      <input id="tab-1" type="checkbox" name="tab">
      <label for="tab-1">Tab 1</label>
      <div class="tab-content">
        <p>
          Next to the risk dictates a nurse. 
          The western rules our receiver. 
          The clumsy conjecture dictates with the operational network. 
          Why can't the trouser concentrate the commercial crisp? 
          The one threat punishes a charge. How will whatever race twist the difficult brick?
        </p>
      </div>
    </div>
    <div class="tab">
      <input id="tab-2" type="checkbox" name="tab">
      <label for="tab-2">Tab 2</label>
      <div class="tab-content">
        <p>
          Should the pace attack? 
          Our pulled nurse breathes the snow.
          Does the subroutine bubble? 
          The poison bankrupts a cabinet powder. 
          The worked pupil smells past the literature. 
          The shoulder hires the rare neighbor.
        </p>
      </div>
    </div>
    <div class="tab">
      <input id="tab-3" type="checkbox" name="tab">
      <label for="tab-3">Tab 3</label>
      <div class="tab-content">
        <p>
          A circumstance strikes a deserved trap. 
          When will the sauce pump a collected wine? 
          A lively resource recovers in the transcript. 
          The technique washes the dual murder. 
          A worship sleeps before the secretary.
        </p>
      </div>
    </div>
        <div class="tab">
      <input id="tab-1" type="checkbox" name="tab">
      <label for="tab-1">Tab 1</label>
      <div class="tab-content">
        <p>
          Next to the risk dictates a nurse. 
          The western rules our receiver. 
          The clumsy conjecture dictates with the operational network. 
          Why can't the trouser concentrate the commercial crisp? 
          The one threat punishes a charge. How will whatever race twist the difficult brick?
        </p>
      </div>
    </div>
    <div class="tab">
      <input id="tab-2" type="checkbox" name="tab">
      <label for="tab-2">Tab 2</label>
      <div class="tab-content">
        <p>
          Should the pace attack? 
          Our pulled nurse breathes the snow.
          Does the subroutine bubble? 
          The poison bankrupts a cabinet powder. 
          The worked pupil smells past the literature. 
          The shoulder hires the rare neighbor.
        </p>
      </div>
    </div>
    <div class="tab">
      <input id="tab-3" type="checkbox" name="tab">
      <label for="tab-3">Tab 3</label>
      <div class="tab-content">
        <p>
          A circumstance strikes a deserved trap. 
          When will the sauce pump a collected wine? 
          A lively resource recovers in the transcript. 
          The technique washes the dual murder. 
          A worship sleeps before the secretary.
        </p>
      </div>
    </div>
        <div class="tab">
      <input id="tab-1" type="checkbox" name="tab">
      <label for="tab-1">Tab 1</label>
      <div class="tab-content">
        <p>
          Next to the risk dictates a nurse. 
          The western rules our receiver. 
          The clumsy conjecture dictates with the operational network. 
          Why can't the trouser concentrate the commercial crisp? 
          The one threat punishes a charge. How will whatever race twist the difficult brick?
        </p>
      </div>
    </div>
    <div class="tab">
      <input id="tab-2" type="checkbox" name="tab">
      <label for="tab-2">Tab 2</label>
      <div class="tab-content">
        <p>
          Should the pace attack? 
          Our pulled nurse breathes the snow.
          Does the subroutine bubble? 
          The poison bankrupts a cabinet powder. 
          The worked pupil smells past the literature. 
          The shoulder hires the rare neighbor.
        </p>
      </div>
    </div>
    <div class="tab">
      <input id="tab-3" type="checkbox" name="tab">
      <label for="tab-3">Tab 3</label>
      <div class="tab-content">
        <p>
          A circumstance strikes a deserved trap. 
          When will the sauce pump a collected wine? 
          A lively resource recovers in the transcript. 
          The technique washes the dual murder. 
          A worship sleeps before the secretary.
        </p>
      </div>
    </div>
        <div class="tab">
      <input id="tab-1" type="checkbox" name="tab">
      <label for="tab-1">Tab 1</label>
      <div class="tab-content">
        <p>
          Next to the risk dictates a nurse. 
          The western rules our receiver. 
          The clumsy conjecture dictates with the operational network. 
          Why can't the trouser concentrate the commercial crisp? 
          The one threat punishes a charge. How will whatever race twist the difficult brick?
        </p>
      </div>
    </div>
    <div class="tab">
      <input id="tab-2" type="checkbox" name="tab">
      <label for="tab-2">Tab 2</label>
      <div class="tab-content">
        <p>
          Should the pace attack? 
          Our pulled nurse breathes the snow.
          Does the subroutine bubble? 
          The poison bankrupts a cabinet powder. 
          The worked pupil smells past the literature. 
          The shoulder hires the rare neighbor.
        </p>
      </div>
    </div>
    <div class="tab">
      <input id="tab-3" type="checkbox" name="tab">
      <label for="tab-3">Tab 3</label>
      <div class="tab-content">
        <p>
          A circumstance strikes a deserved trap. 
          When will the sauce pump a collected wine? 
          A lively resource recovers in the transcript. 
          The technique washes the dual murder. 
          A worship sleeps before the secretary.
        </p>
      </div>
    </div>
        <div class="tab">
      <input id="tab-1" type="checkbox" name="tab">
      <label for="tab-1">Tab 1</label>
      <div class="tab-content">
        <p>
          Next to the risk dictates a nurse. 
          The western rules our receiver. 
          The clumsy conjecture dictates with the operational network. 
          Why can't the trouser concentrate the commercial crisp? 
          The one threat punishes a charge. How will whatever race twist the difficult brick?
        </p>
      </div>
    </div>
    <div class="tab">
      <input id="tab-2" type="checkbox" name="tab">
      <label for="tab-2">Tab 2</label>
      <div class="tab-content">
        <p>
          Should the pace attack? 
          Our pulled nurse breathes the snow.
          Does the subroutine bubble? 
          The poison bankrupts a cabinet powder. 
          The worked pupil smells past the literature. 
          The shoulder hires the rare neighbor.
        </p>
      </div>
    </div>
    <div class="tab">
      <input id="tab-2" type="checkbox" name="tab">
      <label for="tab-2">Tab 2</label>
      <div class="tab-content">
        <p>
          Should the pace attack? 
          Our pulled nurse breathes the snow.
          Does the subroutine bubble? 
          The poison bankrupts a cabinet powder. 
          The worked pupil smells past the literature. 
          The shoulder hires the rare neighbor.
        </p>
      </div>
    </div>
    <div class="tab">
      <input id="tab-2" type="checkbox" name="tab">
      <label for="tab-2">Tab 2</label>
      <div class="tab-content">
        <p>
          Should the pace attack? 
          Our pulled nurse breathes the snow.
          Does the subroutine bubble? 
          The poison bankrupts a cabinet powder. 
          The worked pupil smells past the literature. 
          The shoulder hires the rare neighbor.
        </p>
      </div>
    </div>
    <div class="tab">
      <input id="tab-2" type="checkbox" name="tab">
      <label for="tab-2">Tab 2</label>
      <div class="tab-content">
        <p>
          Should the pace attack? 
          Our pulled nurse breathes the snow.
          Does the subroutine bubble? 
          The poison bankrupts a cabinet powder. 
          The worked pupil smells past the literature. 
          The shoulder hires the rare neighbor.
        </p>
      </div>
    </div>
    <div class="tab">
      <input id="tab-30" type="checkbox" name="tab">
      <label for="tab-30">Tab 3</label>
      <div class="tab-content">
        <p>
          A circumstance strikes a deserved trap. 
          When will the sauce pump a collected wine? 
          A lively resource recovers in the transcript. 
          The technique washes the dual murder. 
          A worship sleeps before the secretary.
           A circumstance strikes a deserved trap. 
          When will the sauce pump a collected wine? 
          A lively resource recovers in the transcript. 
          The technique washes the dual murder. 
          A worship sleeps before the secretary.
           A circumstance strikes a deserved trap. 
          When will the sauce pump a collected wine? 
          A lively resource recovers in the transcript. 
          The technique washes the dual murder. 
          A worship sleeps before the secretary.
           A circumstance strikes a deserved trap. 
          When will the sauce pump a collected wine? 
          A lively resource recovers in the transcript. 
          The technique washes the dual murder. 
          A worship sleeps before the secretary.
           A circumstance strikes a deserved trap. 
          When will the sauce pump a collected wine? 
          A lively resource recovers in the transcript. 
          The technique washes the dual murder. 
          A worship sleeps before the secretary.
           A circumstance strikes a deserved trap. 
          When will the sauce pump a collected wine? 
          A lively resource recovers in the transcript. 
          The technique washes the dual murder. 
          A worship sleeps before the secretary.
           A circumstance strikes a deserved trap. 
          When will the sauce pump a collected wine? 
          A lively resource recovers in the transcript. 
          The technique washes the dual murder. 
          A worship sleeps before the secretary.
           A circumstance strikes a deserved trap. 
          When will the sauce pump a collected wine? 
          A lively resource recovers in the transcript. 
          The technique washes the dual murder. 
          A worship sleeps before the secretary.
           A circumstance strikes a deserved trap. 
          When will the sauce pump a collected wine? 
          A lively resource recovers in the transcript. 
          The technique washes the dual murder. 
          A worship sleeps before the secretary.
           A circumstance strikes a deserved trap. 
          When will the sauce pump a collected wine? 
          A lively resource recovers in the transcript. 
          The technique washes the dual murder. 
          A worship sleeps before the secretary.
           A circumstance strikes a deserved trap. 
          When will the sauce pump a collected wine? 
          A lively resource recovers in the transcript. 
          The technique washes the dual murder. 
          A worship sleeps before the secretary.
           A circumstance strikes a deserved trap. 
          When will the sauce pump a collected wine? 
          A lively resource recovers in the transcript. 
          The technique washes the dual murder. 
          A worship sleeps before the secretary.
           A circumstance strikes a deserved trap. 
          When will the sauce pump a collected wine? 
          A lively resource recovers in the transcript. 
          The technique washes the dual murder. 
          A worship sleeps before the secretary.
        </p>
      </div>
    </div>
  </body>
</html>