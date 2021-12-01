<h1 align="center">学生信息</h1>
<form action="" method="post" name="indexf">
    <p align="center"><input type="button" value="新增" name="addbtn" onclick="location.href='insert.php'" /></p>
    <p align="center"><input type="text" name="sel" /><input type="submit" value="搜索" name="selsub"></p>
    <table align="center" border="1px" cellspacing="0px" width="800px">
        <tr>
            <th>学号</th><th>姓名</th><th>性别</th><th>年龄</th><th>操作</th>
        </tr>

        <?php
        //连接数据库
        $link = mysqli_connect("localhost","root","","homework","3306");
        if (!$link)
            exit("数据库连接失败");

        //查询
        if (empty($_POST["selsub"])){
            $res = mysqli_query($link,"SELECT * FROM students order by stuID;");
        }else{
            $sel = $_POST["sel"];
            $res = mysqli_query($link,"SELECT * FROM students WHERE stuID LIKE '%$sel%' OR stuName LIKE '%$sel%'");
        }

        //显示查询结果
        while ($row = mysqli_fetch_array($res)){
            echo "<tr align='center'>";
            echo "<td>$row[stuID]</td><td>$row[stuName]</td><td>$row[stuSex]</td><td>$row[stuAge]</td>
                  <td>
                        <input type='submit' name='upsub$row[stuID]' value='修改' />
                        <input type='submit' name='delsub$row[stuID]' value='删除' />
                  </td>
            ";
            echo "</tr>";

//修改
//            if (!empty($_POST["upsub$row[stuID]"])){
//                echo "<tr align='center'>";
//                echo "<td>$row[stuID]</td>";
//                echo "</tr>";
//            }
        }
        ?>
    </table>
</form>

