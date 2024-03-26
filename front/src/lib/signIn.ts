import { ResponseApi, UserCredentidials } from './../interfaces/user.d';


const URL = process.env.API_URL;

export function signIn(userCredentials: UserCredentidials) {

	fetch("http://localhost/progWeb/api/SignIn.php", {
		method: "POST",
		headers: {
			"Content-Type": "application/json",
		},
		credentials: "include",
		body: JSON.stringify(userCredentials),
	})
		.then(async (res) => {
			if (!res.ok) {
				throw new Error("ocurrio un error", {
					cause: await res.json(),
				});
			}
			 res.json();
		}).then(res =>{
			return res
		})
		.catch((error) => {
			const errorMessage = error.cause?.msg || "Error desconocido";
			return errorMessage;
		});
}
