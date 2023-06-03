<form action="./Api/ApiResiter.php" method="POST">
     <input type="text" name="name"/> 
     <input type="email" name="email"/> 
     <input  type="password" name="password"/>
     <input type="tel" name="phone"/>
     <input type="text" name="address"/>
     <select type="type" name="type">
          <option value="Administration">Administration</option>
          <option value="student">student</option>
          <option value="teacher">teacher</option>
     </select>   
     <button type="submit">Đăng ký</button>
</form>
