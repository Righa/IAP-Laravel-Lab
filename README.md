### API routes

<table>
	<tbody>
		<tr><td>login </td> <td>POST</td> <td>http://127.0.0.1:8000/api/login</td> <td>email,passpword</td> <td>(all required)</td></tr>
		<tr><td>register</td> <td>POST</td> <td>http://127.0.0.1:8000/api/register</td> <td>name,email,password</td> <td>(all required)</td></tr>
		<tr><td>logout </td> <td>POST</td> <td>http://127.0.0.1:8000/api/login</td> <td>token</td> <td>(required)</td></tr>
		<tr><td>all cars</td> <td>GET</td> <td>http://127.0.0.1:8000/api/cars</td> <td></td> <td></td></tr>
		<tr><td>create a car</td> <td>POST</td> <td>http://127.0.0.1:8000/api/cars</td> <td>avatar,make,model,produced_on</td> <td>(all required)</td></tr>
		<tr><td>specific car</td> <td>GET</td> <td>http://127.0.0.1:8000/api/cars/{id}</td> <td></td> <td></td></tr>
		<tr><td>update car</td> <td>PUT/PATCH</td> <td>http://127.0.0.1:8000/api/cars/{id}</td> <td>avatar/make/model/produced_on</td> <td>(one or many)</td></tr>
		<tr><td>delete car</td> <td>DELETE</td> <td>http://127.0.0.1:8000/api/cars/{id}</td> <td></td> <td></td></tr>
		<tr><td>review a car</td> <td>POST</td> <td>http://127.0.0.1:8000/api/review</td> <td>car_id, comment</td> <td>(all required)</td></tr><tr>
	</tbody>
</table>				

