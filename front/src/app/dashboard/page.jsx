"use client"

import { useRouter } from "next/navigation"
import {useAuthContext} from "@/context/authContext"

function DashboardPage() {

  const router = useRouter()
  const {user} = useAuthContext()

  if (!user) {
      router.push("/")
  }

  return (
    <div className="text-white">
      DashboardPage
    </div>
  )
}
export default DashboardPage