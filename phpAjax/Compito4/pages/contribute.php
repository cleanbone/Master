<h2>NEWSLETTER</h2>
<form id="form" action="index.php?content=inc/form" method="post">
  <div id="info" class="bg-rosso fg-blus"></div>
  <fieldset name="User Details" class="row">
    <label for="name">First Name*:</label>
    <input type="text" name="name" required pattern="[^|+(--)=<>(!=)\)\(%@#\*]{2}"/>
    <label for="surname">Last Name*:</label>
    <input type="text" name="surname" required pattern="[^|+(--)=<>(!=)\)\(%@#\*]{2}"/>
    <label for="email">E-Mail*:</label>
    <input type="email" name="email" required pattern="([\w-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})"/>
  </fieldset>
  <fieldset name="Options" class="row">
    <label for="for">Ferquency:</label>
    <select name="frequency">
      <option value="d">Daily</option>
      <option value="w">Weekely</option>
      <option value="m">Monthly</option>
    </select>
    <label for="format">Format:</label>
    <input type="radio" name="format" value="text" />
    <input type="radio" name="format" value="html" />
    <label for="comment">Type a Comment:</label>
    <textarea name="comment" pattern="[^|+(--)=<>(!=)\)\(%@#\*]{0}"></textarea>
  </fieldset>
  <input type="submit" value="subscribe" formnovalidate/>
  <input type="reset" value="reset" />
</form>
