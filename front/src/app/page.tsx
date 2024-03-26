"use client"
import { useAuthContext } from "@/context/authContext"
import LoginForm from "../components/loginForm/loginForm"
import { useRouter } from "next/navigation"
function HomePage() {

	const {user} = useAuthContext()

	const router = useRouter()
	if (user) {
		router.push("/dashboard")
	}
	

	return (
	  <section>
		<div>
		  <h1 className="text-white text-5xl"></h1>
		  <LoginForm></LoginForm>
		</div>
	  </section>
	)
  }
  
  export default HomePage