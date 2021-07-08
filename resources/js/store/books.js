import axios from 'axios'
import baseUrl from '../baseUrl'

export default{
  namespaced: true,

/*=====================================
  ||||| STATE |||||
  =====================================*/
  state: {
    books: [],
    book: null,
    comments: [],
    sections: [],
    meta: {},
    subjects: []
  },

/*=====================================
  ||||| GETTERS |||||
  =====================================*/
  getters: {
    books( state ) {
      return state.books
    },
    book( state ) {
      return state.book
    },
    comments( state ) {
      return state.comments
    },
    sections( state ) {
      return state.sections
    },
    meta( state ) {
      return state.meta
    },
    subjects( state ) {
      return state.subjects
    }
  },

/*=====================================
  ||||| MUTATIONS |||||
  =====================================*/
  mutations: {
    SET_BOOKS( state, value ) {
      state.books = value
    },

    STORE_BOOK( state, value ) {
      state.books.unshift(value)
    },

    UPDATE_BOOK( state, book ) {
      const key = state.books.findIndex(item => item.id === book.id)
      state.books[key] = book
    },

    DELETE_BOOK( state, book ) {
      let bookIndex = state.books.findIndex(item => item.id === book.id)
      state.books.splice(bookIndex, 1)

    },

    SET_BOOK_DETAILS( state, value ) {
      state.book = value
    },

    SET_BOOK_COMMENTS( state, comments ) {
      state.comments = comments
    },

    SET_ADDITIONAL_BOOK_COMMENTS( state, comments ) {
      state.comments.push(...comments)
    },

    SET_BOOK_COMMENTS_META( state, meta ) {
      state.meta = meta
    },

    UPDATE_COMMENT_LIST( state, comment ) {
      if ( state.meta.current_page < state.meta.last_page ) {
        state.comments.pop()
        state.comments.unshift(comment)
      } else {
        state.comments.unshift(comment)
      }
    },

    UPDATE_COMMENT( state, { comment, body } ) {
      const key = state.comments.findIndex((item) => {
          return item.id === comment;
      })
      state.comments[key].body = body
    },

    DELETE_COMMENT( state, comment ) {
        const key = state.comments.find((item) => {
            return item.id === comment;
        })
      state.comments.splice(key, 1)
    },

    SET_SUBJECTS( state , subjects) {
      state.subjects = subjects
    },

    SET_BOOKS_SECTIONS( state, sections ) {
      state.sections = sections
    }

  },

/*=====================================
  ||||| ACTIONS |||||
  =====================================*/
  actions: {

     //== GET ALL BOOKS
    //====================
    async getBooks ({ commit }) {
      try {
          let response = await axios.get(baseUrl.bookApiUrl);
          commit("SET_BOOKS", response.data.data);
          return Promise.resolve(response.data.data);
      } catch (error) {
          return Promise.reject(error);
      }
    },

     //== STORE NEW BOOK
    //====================
    storeBook ({ commit }, { formData }) {
      return axios.post(baseUrl.bookApiUrl, formData)
      .then((response) => {
        if(response.data.status === 422){
          return Promise.resolve(response)
        } else {
          commit('STORE_BOOK', response.data.data)
          return Promise.resolve(response)
        }
      })
      .catch(error => {
        // console.error(error.response.data)
        // console.error('error uploading file', error.response)
        return Promise.reject(error)
      })
    },

     //== UPDATE BOOK
    //====================
    updateBook ({ commit }, { book, formData }) {
      return axios.post(`${baseUrl.bookApiUrl}/${book}`, formData)
      .then((response) => {
        commit('UPDATE_BOOK', response.data.data)
        return Promise.resolve(response)
      })
      .catch(error => {
        return Promise.reject(error)
      })
    },

     //== DELETE BOOK
    //====================
    removeBook ({ commit }, { book }) {
      return axios.delete(`${baseUrl.bookApiUrl}/${book.uuid}`)
      .then((response) => {
        commit('DELETE_BOOK', book)
        return Promise.resolve(response)
      })
      .catch(error => {
        return Promise.reject(error)
      })
    },

     //== GET SUBJECTS OF BOOKS
    //====================
    fetchSubjects ({ commit }) {

      return axios.get(`${baseUrl.libraryApiUrl}/subjects`)
        .then((response) => {
          commit('SET_SUBJECTS', response.data.data)
          return Promise.resolve(response)
        })
        .catch(error => {
          return Promise.reject(error)
        })
    },

     //== GET ALL BOOKS FOR A PARTICULAR SUBJECT
    //====================
    fetchSubjectBooks ({ commit }, { subject }) {
      return axios.get(`${baseUrl.libraryApiUrl}/subject-books/${subject}`)
      .then((response) => {
        commit('SET_BOOKS', response.data.data)
        return Promise.resolve(response)
      })
      .catch(error => {
        return Promise.reject(error)
      })
    },

  }
}
