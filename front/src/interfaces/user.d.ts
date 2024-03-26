export interface User{
    nameUser: string,
    emailUser?: string,
    idUser: string
}

export interface UserCredentidials {
	nameUser: string;
	passwordUser: string;
}

export interface ResponseApi {
    msg?:string,
    data?: User
}