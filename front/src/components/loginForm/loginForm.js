"use client";

import {  useState } from "react";
import {useAuthContext} from "../../context/authContext"

function LoginForm() {

	const {iniciarSesion} = useAuthContext()

	const [inputs, setInputs] = useState({
		passwordUser: "",
		nameUser: "",
	});

	const handleChange = (e) => {
		setInputs({ ...inputs, [e.target.name]: e.target.value });
	};

	const handleSubmit = (e) => {
		e.preventDefault();
		iniciarSesion(inputs);
	};

	return (
		<div className="h-[calc(100vh-7rem)] flex justify-center items-center">
			<form onSubmit={handleSubmit} className="w-1/4">
				<h1 className="text-slate-200 font-bold text-4xl mb-4">
					Iniciar Sesion
				</h1>

				<label
					htmlFor="user"
					className="text-slate-500 mb-2 block text-sm">
					Usuario:
				</label>
				<input
					type="user"
					name="nameUser"
					onChange={handleChange}
					className="p-3 rounded block mb-2 bg-slate-900 text-slate-300 w-full"
					placeholder="Nombre de usuario"
				/>

				<label
					htmlFor="password"
					className="text-slate-500 mb-2 block text-sm">
					Contraseña:
				</label>
				<input
					type="password"
					name="passwordUser"
					onChange={handleChange}
					className="p-3 rounded block mb-2 bg-slate-900 text-slate-300 w-full"
					placeholder="******"
				/>

				<button className="w-full bg-blue-500 text-white p-3 rounded-lg mt-2">
					Ingresar
				</button>
			</form>
		</div>
	);
}
export default LoginForm;
